var app = angular.module('app', []);

app.controller("FormController", function() {
    this.submitForm = function() {
        console.log("Form submitted...")
    };
});
