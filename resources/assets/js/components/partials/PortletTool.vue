<template>
    <a href="javascript:;"  :m-portlet-tool="tool"
       class="m-portlet__nav-link m-portlet__nav-link--icon">
        <i :class="icon"></i>
    </a>
</template>

<script>
    export default {
        name: "PortletTool",
        props: {
            tool: {
                type: String,
                default: 'toggle'
            }
        },
        computed: {
            icon: function () {
                switch (this.tool) {
                    case 'toggle':
                        return 'la la-angle-down';
                    case 'reload':
                        return 'la la-refresh';
                    case 'fullscreen':
                        return 'la la-expand';
                    case 'remove':
                        return 'la la-close';
                    default:
                        return 'la la-angle-down';
                }
            }
        }
    }
</script>

<style scoped>

</style>
