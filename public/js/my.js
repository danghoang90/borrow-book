$(document).ready(function () {
    let origin = location.origin;
    $(".user-item").hover(function () {
        $(this).css('background-color', "red")
    }, function () {
        $(this).css('background-color', "white")
    })

    $('.delete-user').click(function () {
        if (confirm('Are you sure')) {
            let idUser = $(this).attr('data-id');
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/users/' + idUser + '/delete',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    $('#user-' + idUser).remove();
                },
                error: function (error) {

                }

            })
        }
    })


        $(".book-item").hover(function () {
            $(this).css('background-color', "yellow")
        }, function () {
            $(this).css('background-color', "white")
        })
    $('.delete-books').click(function () {
        if (confirm('Are you sure')) {
            let idBook = $(this).attr('data-id');
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/books/' + idBook + '/delete',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    $('#book-' + idBook).remove();
                },
                error: function (error) {

                }

            })
        }
    });

    $('#search-user').keyup(function () {
        let value = $(this).val();
        if (value) {
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/users/search',
                method: 'GET',
                data: {
                    keyword: value
                },
                dataType: 'json',
                success: function (res) {
                    let html = '';
                    res.forEach(function (item, index) {
                        html += '<button class="list-group-item list-group-item-action">';
                        html += item.name;
                        html += '</button>'
                    })
                    $('#list-user-search').html(html);
                },
                error: function (error) {

                }

            })
        } else  {
            $('#list-user-search').html('');

        }

    });

    $('#search-student-borrow').keyup(function () {
        let value = $(this).val();
        if (value) {
            $.ajax({
                url: origin + '/borrows/search-student',
                method: 'GET',
                data: {
                    keyword: value
                },
                success: function (res) {
                    let html = '';
                    res.forEach(function (item, index) {
                        html += '<button data-id="'+ item.id +'" class="list-group-item list-group-item-action student-item">';
                        html += item.name;
                        html += '</button>'
                    })
                    $('#list-student-borrow-search').html(html);
                    console.log(res)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }else  {
            $('#list-student-borrow-search').html('');
        }
    })

    $('body').on('click','.student-item',function () {
        let idStudentClicked = $(this).attr('data-id');
        $.ajax({
            url: origin + '/borrows/find-student/' + idStudentClicked,
            method: 'GET',
            success: function (res) {
                $('#name-student-borrow').val(res.name);
                $('#email-student-borrow').val(res.email);
                $('#phone-student-borrow').val(res.phone);
                $('#studen-id').val(res.id);
                $('#list-student-borrow-search').html('');
            }
        });
    });

    $('#search-book-borrow').keyup(function (){
        let value = $(this).val();
        if (value) {
            $.ajax({
                url: origin + '/borrows/search-book',
                method: 'GET',
                data: {
                    keyword : value
                },
                success: function (res) {
                    let html = '';
                    res.forEach(function (item, index) {
                        html += '<button data-id="'+ item.id +'" class="list-group-item list-group-item-action book-item">';
                        html += item.name;
                        html += '</button>'
                    })
                    $('#list-book-borrow-search').html(html);
                    console.log(res)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }else {
            $('#list-book-borrow-search').html('')
        }
    });
    $('body').on('click','.book-item',function () {
        let idBookClicked = $(this).attr('data-id');
        $.ajax({
            url: origin + '/borrows/find-book/' + idBookClicked,
            method: 'GET',
            success: function (res) {
                let html = '<td>';
                html += res.name
                html += '</td>';
                html += '<td>'
                html += '<img width="150" src="http://127.0.0.1:8000/storage/'+res.image+'">';
                html += '</td>'
                $('#book-id').val(res.id);
                $('#book-item').html(html)
                $('#list-book-borrow-search').html('')
            }
        });
    });

    $('#create-borrow').click(function () {
        let student_id = $('#studen-id').val();
        let book_id = $('#book-id').val();
        let borrow_date = $('#borrow_date').val();
        let borrow_return = $('#borrow_return').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/borrows/create',
            method: 'POST',
            data: {
                student_id: student_id,
                book_id: book_id,
                borrow_date: borrow_date,
                borrow_return: borrow_return
            },
            success: function (res) {
                console.log(res)
            },
            error: function (error) {
                console.log(error)
            }
        })
    })
})
