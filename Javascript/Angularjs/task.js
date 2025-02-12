angular.module('app', []).controller("MainController", function() {
    this.tasks = [
        {
            name: "Go to grocery",
            done: false
        },
        {
            name: "Walk the dog",
            done: false
        },
        {
            name: "Dinner with boss",
            done: false
        }
    ];

    this.add = function(newtask) {
        console.log("adding task: " + newtask.name);
        var task = {};
        task.name = newtask.name;
        task.done = false;
        this.tasks.push(task);
        newtask.name = "";
    };

    this.delete = function(task) {
        console.log("deleting task: " + task.name);

        for (var i= 0; i < this.tasks.length; i++) {

            if (this.tasks[i].name === task.name) {
                this.tasks.splice(i,1);
                break;
            }
        }
    };
});
