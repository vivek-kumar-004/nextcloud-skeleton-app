<template>
	<div id="content" class="app-skeleton_app">
		<button id="show-btn" @click="showTime">
			Show Time
		</button>
		<p id="show-date" />
	</div>
</template>

<script>
import HttpClient from '@nextcloud/axios'
import { linkTo } from '@nextcloud/router'

export default {
	name: 'App',
	methods: {
		async showTime() {
			// alert('Hi')
			const resp = await HttpClient.get(getLinkofApp())
			// alert(resp.data)

			document.getElementById('show-date').innerHTML = resp.data
		},
	},
}
export function getLinkofApp() {
	// alert('await')
	return [linkTo('skeleton_app', 'index.php'), 'time/index'].join('/')

}
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

#show-btn {
	height: 10px;
}

#show-date {
	margin-left: 14px;
  margin-top: 7px;
}

#content {
	margin: 15px;
}

</style>
