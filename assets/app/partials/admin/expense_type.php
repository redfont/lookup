<div class="content">
    
    <table class="data-table">
        <tr>
            <td colspan="7" class="button-right-align">
                <md-button class="md-button md-raised md-primary" ng-click="vm.showDialog($event, null)">add new</md-button>
            </td>
        </tr>
        <tr class="data-table-header">
            <th>Action</th>
            <th>Code</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Created By</th>
            <th>Updated By</th>
        </tr>
        
        <tr ng-repeat="et in vm.expenseTypes" class="data-main">
            <td style="text-align: center;">
                <a href="" ng-click="vm.showDialog($event, et.code)">Edit</a>
                <a href="" ng-click="vm.removeRecord($event, et.code)">Delete</a>
            </td>
            <td>{{et.code}}</td>
            <td>{{et.description}}</td>
            <td>{{et.date_created}}</td>
            <td>{{et.date_updated}}</td>
            <td>{{et.created_by}}</td>
            <td>{{et.updated_by}}</td>
        </tr>
    </table>
    
</div>