<div>
    <md-button class="md-button md-raised md-primary" ng-click="vm.showDialog($event, null)">add new</md-button>
    <table>
        <tr>
            <th>Action</th>
            <th>Code</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Created By</th>
            <th>Updated By</th>
        </tr>
        
        <tr ng-repeat="et in vm.expenseTypes">
            <td>
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