<?php if ($eror): ?>
  <script type="text/javascript">
    swal({title: "Password Atau Username Salah!", text: "Silakan coba lagi", timer: 3000, type: "error", showConfirmButton: false })
  </script>
<?php endif; ?>
<script type="text/javascript">
top.location='javascript:history.go(-1)';
</script>
