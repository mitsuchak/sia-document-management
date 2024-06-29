<!-- bundle -->
@yield('script')
<script>
var element = document.getElementsByClassName('alert-dismissible');
if(element != undefined){
    setTimeout(() => {
        $('.alert-dismissible').remove();
    }, 3000);
}
</script>
@yield('script-bottom')
