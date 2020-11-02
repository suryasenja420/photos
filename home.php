<input type="hidden" id="txt_page" value="0">
<div class="tengah"></div>
<div class="bawah" id="bawah">
    <div class="loader" style="text-align: center;">
        <img src="assets/img/loading.gif" class="load" id="load" style="visibility:hidden">
    </div>  
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#bawah').on('inview', function(event, isInView) {
          $('#load').attr('style', 'visibility:visible');
            if (isInView) {                  
                var tpage = parseInt($("#txt_page").val()); 
                console.log(tpage);
                $.ajax({
                    type: 'POST',
                    url: 'data.php',
                    data: { page: tpage },
                    success: function(data){
                        if(data != ''){       
                            $('.tengah').append(data);
                            $('#load').attr('style', 'visibility:hidden');
                            
                            tpage++;
                            $("#txt_page").val(tpage);
                            console.log("asd");
                        } else {        
                            $("#loader").hide();
                        }
                    }
                });
            }
        });
    });
</script>