<div class="content">
    
    <table class="data-table">
        <tr>
            <td colspan="7" class="button-right-align">
                <md-button class="md-button md-raised md-primary " ng-click="vm.showDialog($event, null)">add new</md-button>
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
        
        <tr ng-repeat="c in vm.categories" class="data-main">
            <td style="text-align: center;">
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