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
        
        <tr ng-repeat="ct in vm.contactTypes">
            <td>
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