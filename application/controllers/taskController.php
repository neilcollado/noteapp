<?php

class taskController extends scheme {

    public function __construct(){
        if(!$this->getSession('userId')){

            $this->redirect("userController/loginForm");
    
        }
        $this->taskModel = $this->model('taskModel');
    }

    public function index(){
        $userId = $this->getSession('userId');
        $data = $this->taskModel->getData($userId);
        if(empty($data)){
            $this->setFlash("dataEmpty", "No Task List Added Yet.");
        }
        $this->view("task", $data);
    }

    public function taskForm(){
        $this->view("addtask");
    }

   

    public function createTaskList(){
        $taskData = [
            'taskName'  => $this->input('taskName'),
            'taskDesc'  => $this->input('taskDesc'),
            'taskError' => ''
        ];

        if($this->taskModel->checkTask($taskData['taskName'])){

            $taskData['taskError'] = "Sorry this task already exist.";
            $this->setFlash("taskError", $taskData['taskError']);
           
        }

        if(empty($taskData['taskError'])){
            $data = [$taskData['taskName'], $taskData['taskDesc'], $this->getSESSION('userId')];
            if($this->taskModel->addTask($data)){
                $this->setFlash('taskAdded', 'Your task has been added your list successfully.');
                $this->redirect('taskController/index');
            }
        }
        else{
            $this->view("addtask");
        }
    }

    public function viewTask($id){
        $userId = $this->getSession('userId');
        $task = $this->taskModel->getTask($id);
        $user = $this->taskModel->getUser($userId);
        $data = [
            'task'=> $task,
            'user' => $user
        ];
        $this->view("viewtask", $data);

    }
   
    public function deleteTask($id){
        if($this->taskModel->deleteTask($id)){
            $this->setFlash('deletedTask', 'Your task has been deleted successfully');
            $this->redirect('taskController/index');
        }
  
    }

    public function editTask($id){
        $userId = $this->getSession('userId');
        $data = $this->taskModel->editTask($id,$userId);
        $this->view("edit_task", $data);
    }

    public function updateTask(){
        $id = $this->input('hiddenId');
        $userId = $this->getSession('userId');
        $taskEdit = $this->taskModel->editTask($id,$userId);
        $taskData = [
            'taskName' => $this->input('taskName'),
            'taskDesc' => $this->input('taskDesc'),
            'hiddenId' => $this->input('hiddenId'),
            'data' => $taskEdit
        ];
        $updatedTask = [$taskData['taskName'], $taskData['taskDesc'],$taskData['hiddenId'],$userId];
        print_r($updatedTask);
        if($this->taskModel->updateTask($updatedTask)){
            $this->setFlash('TaskUpdated', 'Your task record has been updated successfully');
            $this->redirect('taskController/index');
        }else{
            $this->view("edit_task",$taskData);
        }

    }

    public function logout(){
        $this->destroy();
        $this->redirect("userController/loginForm");

    }


}

?>