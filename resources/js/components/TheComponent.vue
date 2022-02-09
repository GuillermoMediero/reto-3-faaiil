<template>
<div class="container">
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  &copy;2022-{{currentYear}}
       realizado exclusivamente <i class="material-icons">favorite</i>por
      <a target="_blank">FAAIIL</a> e <a target="_blank">IGOBIDE</a> para uso exclusivo.
  </div>                    
    </div>

</template>

<script>
export default {
  data() {
    return {
      currentYear: new Date().getFullYear(), // 2020
    };
  }
};
</script>
