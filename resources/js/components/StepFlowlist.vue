<template>
  <ul class="p-flow-list">
    <li v-for="kostep in filterkosteps"
      :key="kostep.id">
      <step-flowitem
        :kostep="kostep"></step-flowitem>
    </li>
  </ul>
</template>
<script>
  import StepFlowitem from './StepFlowitem.vue';
  export default {
    name: 'StepFlowlist',
    props:{
      kosteps: { type: Array, required: true },
      completes: { type: Array, required: true }
    },
    data: function () {
      return{
        kostep:{}
      }
    },
    computed:{
      // 完了済みのstep_idには、isDoneをtrueに、未完了はfalseにする
      filterkosteps: function(){
        this.kosteps.forEach((kostep, i) => {
          if(this.completes.includes(kostep.id)){
            this.$set(this.kosteps[i], "isDone", true);
          }else{
            this.$set(this.kosteps[i], "isDone", false);
          }
        });
        return this.kosteps;
      }
    }
  }
</script>