<template>
	<div id="content" class="app-skeleton_app">
		<div>
			<h1><b>Documents</b></h1>
		</div>
		<div>
			<ol>
				<DocumentClassManager v-for="docClass in documentClasses" :key="docClass.id" :doc-props="docClass" />
			</ol>
		</div>
	</div>
</template>

<script>

import DocumentClassManager from './Components/DocumentClassManager';

export default {
	name: 'App',
	components: {
		DocumentClassManager,
	},
	data: function() {
		return {
			documentClasses: [{
				'id': 1,
				'name': 'Internal Lab Report',
				'extension': ['pdf'],
				'status': 1,
			}, {
				'id': 2,
				'name': 'Picture Products',
				'extension': ['jpeg', 'jpg', 'png'],
				'status': 0,
			}],
		};
	},

};
</script>
<style scoped>
	#app-content > div {
		width: 100%;
		height: 100%;
		padding: 20px;
		display: flex;
		flex-direction: column;
		flex-grow: 1;
	}

	input[type='text'] {
		width: 100%;
	}

	textarea {
		flex-grow: 1;
		width: 100%;
	}
</style>
