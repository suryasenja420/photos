<div id="wrapper">
    <section>
        <div class="data-container"></div>
        <div id="pagination-demo2"></div>
    </section>
</div>
<script>
$(function() {
    (function(name) {
        var container = $('#pagination-' + name);
        container.pagination({
            dataSource:  function(done) {
                $.ajax({
                    type: 'GET',
                    url: 'data.json',
                    success: function(response) {
                        done(response);
                    }
                });
            },

            locator: 'items',
            totalNumber: 120,
            pageSize: 20,
            ajax: {
                beforeSend: function() {
                    container.prev().html('<div class="loader" style="text-align: center;"><img src="assets/img/loading.gif" class="load" id="load"></div>');
                }
            },
            callback: function(response, pagination) {
                window.console && console.log(22, response, pagination);
                var dataHtml = '';

                $.each(response, function (index, item) {
                  dataHtml += '<img src="https://drive.google.com/uc?id='+item.id+'" alt="' + item.alt + '" style="width:100%"><br><br>';
                });


                container.prev().html(dataHtml);
            }
        })
    })('demo2');
})
</script>