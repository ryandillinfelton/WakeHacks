function expand(itemNum) {
	var grid = document.getElementById('mainContent');
	var items = grid.getElementsByClassName('service-item');
	console.log(items.length);
	console.log(itemNum);
	var expandedInfo = items[itemNum].getElementsByClassName('expanded-info-closed')[0];
	var expandImage = items[itemNum].getElementsByTagName('img')[0];
	if (typeof(expandedInfo) == 'undefined' ) {
		//close
		expandedInfo = items[itemNum].getElementsByClassName('expanded-info-open')[0];
		console.log(expandedInfo);
		expandedInfo.classList.remove('expanded-info-open');
		expandedInfo.classList.add('expanded-info-closed');
		items[itemNum].classList.remove('upside-down');
	} else {
		//Open
		console.log(expandedInfo);
		expandedInfo.classList.remove('expanded-info-closed');
		expandedInfo.classList.add('expanded-info-open');
		items[itemNum].classList.add('upside-down');
	}
}