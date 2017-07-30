(function () {
    var app = angular.module("tabber", []);

    app.controller("tabcontroller", function () {
        this.tab = 0;

        this.setTab = function (tabId) {
            this.tab = tabId;
        };

        this.isSet = function (tabId) {
            return this.tab === tabId;
        };
    });
})();
