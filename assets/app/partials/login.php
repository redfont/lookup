<div style="height:100px;border: 1px solid black;">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" ng-model="vm.user.username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" ng-model="vm.user.password"> </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right">
                <input type="button" ng-click="vm.submit()" value="Login">
                <input type="reset" ng-click="vm.reset()" value="Reset">
            </td> 
        </tr>
    </table>
</div>