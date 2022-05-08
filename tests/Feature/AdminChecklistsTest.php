<?php

namespace Tests\Feature;

use App\Http\Livewire\TasksTable;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use App\Models\Task;
use App\Models\User;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Services\MenuService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;


class AdminChecklistsTest extends TestCase
{

    //refresh testing database on every launch
    use RefreshDatabase;


    public function setUp(): void
    {
        parent::setUp();

        $admin = User::factory()->create(['role_id'   =>  1]);
        $this->assertNotNull($admin);
        $this->actingAs($admin);
    }


    public function test_manage_checklist_groups()
    {

        $new_checklist_name= 'TDD First Gorup';
        $updated_checklist_name = 'TDD First Gorup (updated)';

        //create test case
        $response = $this->post('admin/checklist_groups',[
            'name'  =>  'TDD First Gorup',
            'description'   =>  'description'
        ]);
        $response->assertRedirect('/welcome');

        $group = ChecklistGroup::where('name',$new_checklist_name)->first();
        $this->assertNotNull($group);

        //update test case
        $response = $this->get('admin/checklist_groups/'.$group->id.'/edit');
        $response->assertOk();

        $response = $this->put('admin/checklist_groups/'.$group->id,[
            'name'  =>  $updated_checklist_name,
            'description'   =>  'description (updated)'
        ]);
        $response->assertRedirect('/welcome');

        $group = ChecklistGroup::where('name',$updated_checklist_name)->first();
        $this->assertNotNull($group);

        $this->menu_test($updated_checklist_name,1);


        //delete test case
        $response = $this->delete('admin/checklist_groups/'.$group->id);
        $response->assertRedirect('welcome');

        $group = ChecklistGroup::where('name',$updated_checklist_name)->first();
        $this->assertNull($group);

        $this->menu_test($updated_checklist_name,0);

    }


    public function test_manage_checklists()
    {

        $checklist_group = ChecklistGroup::factory()->create();

        $checklist_url = 'admin/checklist_groups/'.$checklist_group->id.'/checklists';

        //test creating the checklist
        $response = $this->get($checklist_url."/create");
        $response->assertStatus(200);

        $response = $this->post($checklist_url,[
            'name'  =>  'First checklist',
            'description'   =>  'description'
        ]);
        $response->assertRedirect('welcome');

        $checklist = Checklist::where('name','First checklist')->first();
        $this->assertNotNull($checklist);


        //test editing the checklist
        $response = $this->get($checklist_url."/".$checklist->id."/edit");
        $response->assertStatus(200);

        $response = $this->put($checklist_url."/".$checklist->id,[
            'name'  =>  'First checklist (updated)',
            'description'   =>  'description (updated)'
        ]);
        $response->assertRedirect('welcome');

        $checklist = Checklist::where('name','First checklist (updated)')->first();
        $this->assertNotNull($checklist);

        $menu = (new MenuService())->get_menu();
        $this->assertTrue($menu['admin_menu']->first()->checklists->contains($checklist));


        //test deleting the checklist
        $response = $this->delete($checklist_url."/".$checklist->id);
        $response->assertRedirect('welcome');

        $deleted_checklist = Checklist::where('name','First checklist (updated)')->first();
        $this->assertNull($deleted_checklist);

        $menu = (new MenuService())->get_menu();
        $this->assertFalse($menu['admin_menu']->first()->checklists->contains($checklist));
    }


    public function test_manage_tasks()
    {

        //create task test
        $new_task_name = 'New task name';
        $updated_task_name = 'Updated task name';
        $checklist_group = ChecklistGroup::factory()->create();
        $checklist = Checklist::factory()->create(['checklist_group_id' => $checklist_group->id]);

        $tasks_url = 'admin/checklists/' . $checklist->id . '/tasks';
        $response = $this->post($tasks_url, [
            'name' => $new_task_name,
            'description' => 'New task description'
        ]);
        $response->assertRedirect('admin/checklist_groups/' . $checklist_group->id . '/checklists/' . $checklist->id . '/edit');

        $task = Task::where('name', $new_task_name)->first();
        $this->assertNotNull($task);
        $this->assertEquals(1, $task->position);

        //edit task test
        $response = $this->put($tasks_url . '/' . $task->id, [
            'name' => $updated_task_name,
            'description' => $task->description
        ]);
        $response->assertRedirect('admin/checklist_groups/' . $checklist_group->id . '/checklists/' . $checklist->id . '/edit');

        $task = Task::where('name', $updated_task_name)->first();
        $this->assertNotNull($task);

    }


    public function test_delete_task_with_position_reordered()
    {

        $checklist_group = ChecklistGroup::factory()->create();
        $checklist = Checklist::factory()->create(['checklist_group_id' => $checklist_group->id]);

        $task1 = Task::factory()->create(['checklist_id' => $checklist->id, 'position' => 1]);
        $task2 = Task::factory()->create(['checklist_id' => $checklist->id, 'position' => 2]);

        $tasks_url = 'admin/checklists/' . $checklist->id . '/tasks';
        $response = $this->delete($tasks_url . '/' . $task1->id);
        $response->assertRedirect('admin/checklist_groups/' . $checklist_group->id . '/checklists/' . $checklist->id . '/edit');

        $task = Task::where('name', $task1->name)->first();
        $this->assertNull($task);

        $task = Task::where('name', $task2->name)->first();
        $this->assertNotNull($task);
        $this->assertEquals(1, $task->position);

    }

    public function test_reordering_task_with_livewire()
    {
        $checklist_group = ChecklistGroup::factory()->create();
        $checklist = Checklist::factory()->create(['checklist_group_id' => $checklist_group->id]);

        $task1 = Task::factory()->create(['checklist_id' => $checklist->id, 'position' => 1]);
        $task2 = Task::factory()->create(['checklist_id' => $checklist->id, 'position' => 2]);

        Livewire::test(TasksTable::class, ['checklist' => $checklist])
            ->call('task_up', $task2->id);

        $task = Task::find($task2->id);
        $this->assertEquals(1, $task->position);

        Livewire::test(TasksTable::class, ['checklist' => $checklist])
            ->call('task_down', $task2->id);

        $task = Task::find($task2->id);
        $this->assertEquals(2, $task->position);
    }

    /**
     *  some custom test helper functions
     * @param $updated_checklist_name
     * @param int $expected
     */

    private function menu_test($updated_checklist_name,$expected = 1)
    {
        $menu = (new MenuService())->get_menu();
        $count = $menu['admin_menu']->where('name',$updated_checklist_name)->count();
        $this->assertEquals($expected,$count);
    }



}
