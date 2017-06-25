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
        
        <tr ng-repeat="c in vm.categories">
            <td>
                <a href="" ng-click="vm.showDialog($event, c.code)">Edit</a>
                <a href="" ng-click="vm.removeRecord($event, c.code)">Delete</a>
            </td>
            <td>{{c.code}}</td>
            <td>{{c.description}}</td>
            <td>{{c.date_created}}</td>
            <td>{{c.date_updated}}</td>
            <td>{{c.created_by}}</td>
            <td>{{c.updated_by}}</td>
        </tr>
    </table>
    
</div>