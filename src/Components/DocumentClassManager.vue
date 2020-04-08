<template>
	<div>
		<div>
			<AppNavigationItem allowCollapse=true :title="docProps.name" icon="icon-folder">
				<DocumentManager v-for="docClass in documentClasses" :key="docClass.id" :doc-props="docClass" />
			</AppNavigationItem>
		</div>
	</div>
</template>

<script>

import { AppNavigationItem } from '@nextcloud/vue/dist/Components/AppNavigationItem'
import DocumentManager from './DocumentManager';

export default {
	name: 'DocumentClassManager',
	components: {
		DocumentManager,
		AppNavigationItem,
	},
	directives: {},
	props: {
		docProps: {
			type: String,
			required: true,
		},
	},
	data: function() {
		return {
			documentClasses: [{
				'id': 1,
				'name': 'Pic-Prod-01.jpeg',
				'type': 'jpeg',
				'href': 'www.xyz.com/Pic-Prod-01',
				'classId': 2,
			}, {
				'id': 2,
				'name': 'Pic-Prod-02.jpeg',
				'type': 'jpeg',
				'href': 'www.xyz.com/Pic-Prod-02',
				'classId': 2,
			}, {
				'id': 3,
				'name': 'Pic-Prod-03.jpeg',
				'type': 'jpeg',
				'href': 'www.xyz.com/Pic-Prod-03',
				'classId': 2,
			}],
		};
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
