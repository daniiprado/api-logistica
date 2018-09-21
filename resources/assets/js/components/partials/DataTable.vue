<template>
    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable" :id="id">
        <slot></slot>
    </table>
    <!--ends: Datatable -->
</template>

<script>
    import {mixinDataTable} from "../../mixins/mixin-datatable";
    export default {
        name: "DataTable",
        mixins: [ mixinDataTable ],
        props: {
            id: {
                type: String,
                default: 'm_data_table',
            }
        }

    }
</script>

<style scoped>

</style>
