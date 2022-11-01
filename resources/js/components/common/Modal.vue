
<template>
    <div class="modal-mask">
        <div class="modal fade show" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ModalTitle}}</h5>
                    <button type="button" class="close" @click="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="save">{{ModalConfirmBtnTxt}}</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Modal",
    props: {
        ModalTitle: null,
        ModalConfirmBtnTxt: null,
        item: {}
    },
    methods: {
        close(){
            this.$emit('close');
        },

        save(){
            this.$emit('save');
        }
    }
}
</script>
<style scoped>
.modal {
    display:block;
    z-index: 999 !important;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

</style>