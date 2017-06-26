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
        
        <tr ng-repeat="ct in vm.contactTypes" class="data-main">
            <td style="text-align: center;">
                <a href="" ng-click="vm.showDialog($event, ct.code)">Edit</a>
                <a href="" ng-click="vm.removeRecord($event, ct.code)">Delete</a>
            </td>
            <td>{{ct.code}}</td>
            <td>{{ct.description}}</td>
            <td>{{ct.date_created}}</td>
            <td>{{ct.date_updated}}</td>
            <td>{{ct.created_by}}</td>
            <td>{{ct.updated_by}}</td>
        </tr>
    </table>
    
</div>