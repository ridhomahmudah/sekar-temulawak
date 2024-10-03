<template>
    <div>
      <h1>Jumlah Klik: {{ count }}</h1>
      <button @click="increment">Tambah Klik</button>
      <compB :count="count" />
    </div>
  </template>
  
  <script>
  import { ref } from "vue";
  import compB from "./compB.vue";
  
  export default {
    setup() {
      const count = ref(0);
  
      const increment = () => {
        count.value++;
      };
  
      return { count, increment };
    },
    components: {
        compB,
    }
  };
  </script>
  