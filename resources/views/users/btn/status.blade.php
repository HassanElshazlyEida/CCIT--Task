<div class="row">
    @if($user->activate)
        <div class="col-3">
            <span class="switch switch-success">
            <label>
                <input type="checkbox"
                id="{{$user->id}}" {{($user->activate) ? 'checked' : ''}}
                onclick="changeUserStatus(event.target, {{ $user->id }});"/>
            <span></span>
            </label>
            </span>
        </div>
    @else
        <div class="col-3">
            <span class="switch switch-danger">
            <label>
                <input type="checkbox"
                id="{{$user->id}}" {{($user->activate) ? 'checked' : ''}}
                onclick="changeUserStatus(event.target, {{ $user->id }});"/>
            <span></span>
            </label>
            </span>
        </div>
    @endif
</div>
<script>
function changeUserStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    var id =id;
    $.ajax({
        url:"{{ route('user.status') }}",
        type: 'post',
        data: {
            _token: '{{csrf_token()}}',
            id: id,
            status: status
        },
        success: function (result) {
            $('#'+id).closest('span').toggleClass("switch-success switch-danger");
        },
        error: function (data, textStatus, errorThrown) {
            //console.log(data);
        },
    });
}
</script>
