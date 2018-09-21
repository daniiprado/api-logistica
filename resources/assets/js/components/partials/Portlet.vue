<!--
  - Copyright (c) 2017 - 2018. Daniel Prado. All Rights Reserved. All material on this project, including design, text, images, logos, code and sounds, are owned by Daniel Prado, either through copyright or trademark, unless otherwise indicated. Content may not be copied, reproduced, transmitted, distributed, downloaded or transferred in any form or by any means without Daniel Prado's prior written consent, and with express attribution to Daniel Prado. The only exception is that one temporary copy may be downloaded into a single computer's memory and one unaltered permanent copy may be used by the viewer for personal and non-commercial use only, with an attached copy of Daniel Prado's Disclaimer Notice. No part of the downloaded copy may be subsequently reproduced, disseminated or transferred. Copyright infringement is a violation of federal law subject to criminal and civil penalties. (For permission to reprint, please contact Daniel Prado at (+571) 318-603-7095 or via email at danii.prado@outlook.com.ar)
  -->

<template>
    <!--begin::Portlet-->
    <div class="m-portlet m-portlet--mobile"  m-portlet="true">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <span class="m-portlet__head-icon">
                        <i :class="icon"></i>
                    </span>
                    <h3 class="m-portlet__head-text m--font-brand" v-text="title"></h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <action-item>
                        <portlet-tool></portlet-tool>
                    </action-item>
                    <action-item>
                        <portlet-tool tool="reload"></portlet-tool>
                    </action-item>
                    <action-item>
                        <portlet-tool tool="fullscreen"></portlet-tool>
                    </action-item>
                    <action-item>
                        <portlet-tool tool="remove"></portlet-tool>
                    </action-item>
                    <slot name="actions"></slot>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div :class="{ 'm-scrollable': isScrollable }"
                 :data-scrollable="isScrollable"
                 :data-height="scrollHeight"
                 :data-scrollbar-shown="isScrollable">
                <slot></slot>
            </div>
        </div>
        <div v-if="hasFooter" class="m-portlet__foot">
            <slot name="footer"></slot>
        </div>
    </div>
    <!--end::Portlet-->
</template>

<script>
    export default {
        name: "Portlet",
        props: {
            title: {
                type: String,
                default: ''
            },
            icon: {
                type: String,
                default: 'flaticon-cogwheel-2'
            },
            hasFooter: {
                type: Boolean,
                default: false
            },
            isScrollable: {
                type: Boolean,
                default: false
            },
            scrollHeight: {
                type: Number,
                default: 300
            }
        }
    }
</script>

<style scoped>

</style>
