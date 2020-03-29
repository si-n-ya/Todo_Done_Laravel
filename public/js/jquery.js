$(function() {
    "use strict";

    // todoをチェックした時（ajax）
    $(".todos").on("click", ".check_update", function() {
        let id = $(this)
            .parents(".todo_row")
            .data("id");
        $.ajax({
            url: "/todo_done/ajax",
            type: "post",
            dataType: "json",
            data: {
                id: id,
                mode: "state_update"
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        })
            .done(function(res) {
                if (res.state === 1) {
                    $(".todo_" + id)
                        .find(".todo_title")
                        .addClass("todo_finish");
                } else {
                    $(".todo_" + id)
                        .find(".todo_title")
                        .removeClass("todo_finish");
                }
            })
            .fail(function(data) {
                console.log(data);
            });
    });

    $(".todo_btn_box").on("click", ".delete_btn", function(e) {
        if (confirm("本当に削除しますか？")) {
        } else {
            e.preventDefault();
        }
    });

    $(".done_btn_box").on("click", ".delete_btn", function(e) {
        if (!confirm("本当に削除しますか？")) {
            e.preventDefault();
        }
    });

    $(".delete_memo_box").on("click", ".delete_btn", function(e) {
        if (!confirm("本当に削除しますか？")) {
            e.preventDefault();
        }
    });
});
