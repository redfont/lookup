<div>
    <md-button class="md-button md-raised md-primary" ng-click="vm.showDialog($event, 0)">add new</md-button>
    <table>
        <tr>
            <th>Action</th>
            <th>Username</th>
            <th>Email</th>
            <th>Date Created</th>
            <th>Date Updated</th>
        </tr>
        
        <tr ng-repeat="u in vm.users">
            <td>
                <a href="" ng-click="vm.showDialog($event, u.user_id)">Edit</a>
                <a href="#">Delete</a>
            </td>
            <td>{{u.username}}</td>
            <td>{{u.email}}</td>
            <td>{{u.dateCreated}}</td>
            <td>{{u.dateUpdated}}</td>
        </tr>
    </table>
</div>