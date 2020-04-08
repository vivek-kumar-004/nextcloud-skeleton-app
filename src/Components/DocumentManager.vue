<template>
	<div>
		<li><b>{{ docProps.type }}</b> <a :href="docProps.href">{{ docProps.name }}</a></li>
	</div>
</template>>

<script>

export default {
	name: 'DocumentManager',
	directives: {},
	props: {
		docProps: {
			type: String,
			required: true,
		},
	},
	data() {
		return {};
	},
	computed: {},
	watch: {},
	mounted() {},
	methods: {},
};
</script>
<style lang="scss" scoped>
	#app-navigation .app-navigation-entry-edit div {
		width: auto;
		display: block;
	}
	.app-navigation-entry-bullet-wrapper {
		position: absolute;
		left: 33px;
		width: 44px !important;
		margin: 6px;
		height: 44px;
		.color0 {
			width: 30px !important;
			height: 30px;
			border-radius: 50%;
			background-size: 14px;
		}
	}
</style>
