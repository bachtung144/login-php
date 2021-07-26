$(document).ready(function () {
    $('#add-btn').click(function(){
        $('#add-modal').css("visibility", "visible");
    });

    $('.close').click(function(){
        $('#add-modal').css("visibility", "hidden");
        $('#edit-modal').css("visibility", "hidden");
        $('.name-input').val('');
        $('.address-input').val('');
        $('.salary-input').val('');
    })

    $('#submit-add-btn').click(function(){
        var data = $('#add-form').serialize();
        
        $.ajax({
            data: data,
            type: 'post',
            url: 'home/store',
            success: function(res){
                if(!res){
                    $('.name-input').val('');
                    $('.address-input').val('');
                    $('.salary-input').val('');
                    $('#add-modal').css("visibility", "hidden");
                    alert('Added successfully');
                    location.reload();
                } else {
                    alert(res);
                }
            }
        })
    })

    $('.delete-btn').click(function(){
        $.ajax({
            data: {
                id: $(this).attr('value')
            },
            type: 'post',
            url: 'home/delete',
            success: function(res){
                if(!res){
                    alert("Delete successfully");
                    location.reload();
                } else {
                    alert(res);
                }
            }
        })
    })

    $('.edit-btn').click(function(){
        $('#edit-modal').css("visibility", "visible");

        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var address = $(this).attr('data-address');
        var salary = $(this).attr('data-salary');
        
        $('#id_u').val(id);
        $('#name_u').val(name);
        $('#address_u').val(address);
        $('#salary_u').val(salary);
    })

    $('#submit-edit-btn').click(function(){
        var data = $('#edit-form').serialize();
        $.ajax({
            data: data,
            type: 'post',
            url: 'home/update',
            success: function(res){
                if(!res){
                    $('.name-input').val('');
                    $('.address-input').val('');
                    $('.salary-input').val('');
                    $('#edit-modal').css("visibility", "hidden");
                    alert('Edited successfully');
                    location.reload();
                } else {
                    alert(res);
                }
            }
        })
    })
})

