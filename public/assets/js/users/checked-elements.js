
$('#submit').on('click', function(event) {
    var checked_users = {}, checked_groups = {}, checked_permissions = {}, counter = 0;
    $("#check-list-users li.active").each(function(idx, li) {
        checked_users[counter] = $(li).data('id');
        counter++;
    });
    $('#user-elements').val(JSON.stringify(checked_users));

    counter = 0;
    $("#check-list-groups li.active").each(function(idx, li) {
        checked_groups[counter] = $(li).data('id');
        counter++;
    });
    $('#group-elements').val(JSON.stringify(checked_groups));

    counter = 0;
    $("#check-list-permissions li.active").each(function(idx, li) {
        checked_permissions[counter] = $(li).data('id');
        counter++;
    });
    $('#permission-elements').val(JSON.stringify(checked_permissions));
});