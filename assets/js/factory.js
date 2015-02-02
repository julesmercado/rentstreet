myApp
		.factory('getUrl',[
			function factory(){
				return {
					url: '/rentstreet.ph',
					header: {
						headers: {
							'Content-Type' : 'application/x-www-form-urlencoded'
						}
					}
				}
			}
	]);
	