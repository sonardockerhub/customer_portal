<script>close=document.getElementById("close");close.addEventListener('click',function(){close.style.opacity="0"; setTimeout(function(){ close.style.display="none"; }, 600); },false);</script>
<script src="/assets/js/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="/assets/lang.dist.js"></script>

<script>
   var _portal = {
       currencySymbol: '{{Config::get("customer_portal.currency_symbol")}}',
       thousandsSeparator: '{{Config::get("customer_portal.thousands_separator")}}',
       decimalSeparator: '{{Config::get("customer_portal.decimal_separator")}}'
   };
</script>
<script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="/assets/libs/chart.js/Chart.extension.min.js"></script>
<script src="/assets/libs/highlight/highlight.pack.min.js"></script>
<script src="/assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="/assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="/assets/libs/list.js/dist/list.min.js"></script>
<script src="/assets/libs/select2/select2.min.js"></script>
<script src="/assets/js/vendor/jquery.payment/jquery.payment.min.js"></script>
<script src="/assets/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/assets/js/vendor/moment/moment.min.js"></script>

<script>moment.locale('{{Config::get("app.locale")}}');</script>
<script>
   $(document).ready(function(){
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});$(".languageSelector").change(function(){var language = $(this).val();$.ajax("/language",{data: {language: language},dataType: 'json',type: 'POST'}).then(function() {setTimeout(function(){location.reload();}, 100);});});});
   
   Number.prototype.formatCurrency = function(c){
       var n = this,
           c = isNaN(c = Math.abs(c)) ? 2 : c,
           d = _portal.decimalSeparator,
           t = _portal.thousandsSeparator,
           s = n < 0 ? "-" : "",
           i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
           j = (j = i.length) > 3 ? j % 3 : 0;
       return _portal.currencySymbol + s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
   };
</script>
@yield('additionalJS')