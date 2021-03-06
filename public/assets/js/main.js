/**
 * Get product list.
 * @return {void}
 */
function getList() {
	const Http = new XMLHttpRequest();
	const urlList = '/api/list.php';
	Http.onreadystatechange = (e) => {
		if (Http.readyState == 4 && Http.status == 200) {
			const response = JSON.parse(Http.responseText);
			for (var productId in response.products) {
				var node = document.createElement("LI");
				var textnode = document.createTextNode(response.products[productId]);
				node.appendChild(textnode);
				node.setAttribute('data-id', productId);
				node.setAttribute('onclick', 'getInfo("'+productId+'")');
				document.getElementById("list").appendChild(node);
			}
		}
	}
	Http.open("GET", urlList, true);
	Http.send();
}

/**
 * Get product information
 * @param  {string} productId
 * @return {void}
 */
function getInfo(productId) {
	const Http = new XMLHttpRequest();
	const urlInfo = '/api/info.php?id='+productId;
	Http.onreadystatechange = (e) => {
		if (Http.readyState == 4 && Http.status == 200) {
			// Empty the box
			const infoBox = document.getElementById("info");
			infoBox.innerHTML = '';

			const response = JSON.parse(Http.responseText);

			// Add product title
			if (response[productId].name) {
				var title = document.createElement("h2");
				var titleContent = document.createTextNode(response[productId].name);
				title.appendChild(titleContent);
				infoBox.appendChild(title);
			}

			// Add product type
			if (response[productId].type) {
				var type = document.createElement("h4");
				var typeContent = document.createTextNode('Type: '+response[productId].type);
				type.appendChild(typeContent);
				infoBox.appendChild(type);
			}

			// Add product description
			if (response[productId].description) {
				var desc = document.createElement("p");
				var descContent = document.createTextNode(response[productId].description);
				desc.appendChild(descContent);
				infoBox.appendChild(desc);
			}

			// Add the product list of suppliers
			if (response[productId].suppliers) {
				var listNode = document.createElement("UL");
				for (var i = response[productId].suppliers.length - 1; i >= 0; i--) {
					var node = document.createElement("LI");
					var textnode = document.createTextNode(response[productId].suppliers[i]);
					node.appendChild(textnode);
					listNode.appendChild(node)
				}
				infoBox.appendChild(listNode);
			}
		}
	}
	Http.open("GET", urlInfo, true);
	Http.send();
}
