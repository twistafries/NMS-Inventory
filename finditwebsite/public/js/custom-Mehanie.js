/*Official Receipt No. - Lock/Unlock*/
function lock() {
			document.getElementById("text").disabled = true;
			document.getElementById("lock-unlock-button").onclick = unlock;
			document.getElementById("lock-unlock").className = "fas fa-lock";
		}

function unlock() {
			document.getElementById("text").disabled = false;
			document.getElementById("lock-unlock-button").onclick = lock;
			document.getElementById("lock-unlock").className = "fas fa-lock-open";
		}

/*Status - Lock/Unlock*/
function lock2() {
			document.getElementById("text2").disabled = true;
			document.getElementById("lock-unlock-button2").onclick = unlock2;
			document.getElementById("lock-unlock2").className = "fas fa-lock";
		}

function unlock2() {
			document.getElementById("text2").disabled = false;
			document.getElementById("lock-unlock-button2").onclick = lock2;
			document.getElementById("lock-unlock2").className = "fas fa-lock-open";
		}

		// var $check = $("input[type=checkbox]"),
		//   el;
		//
		// $check
		//   .data('checked', 0)
		//   .click(function(e) {
		//
		//     el = $(this);
		//
		//     switch (el.data('checked')) {
		//
		//       // unchecked, going checked
		//       case 0:
		//         el.data('checked', 1);
		// 				el.prop('checked', true);
		//         break;
		//
		//       // checked, going inderterminate
		//       case 1:
		//         el.data('checked', 2);
		//         el.prop('indeterminate', true);
		//         el.prop('checked', false);
		//         break;
		//
		//       // indeterminate, going unchecked
		//       default:
		//         el.data('checked', 0);
		//         el.prop('indeterminate', false);
		//         el.prop('checked', false);
		//
		//     }
		//
		//   });

			function ts(cb) {
			  if (cb.readOnly) cb.checked=cb.readOnly=false;
			  else if (!cb.checked) cb.readOnly=cb.indeterminate=true;
			}


/*Categories - Select all checkbox*/

function toggle(source) {
    checkboxes = document.getElementsByName('ALL');
    for ( var i in checkboxes)
        checkboxes[i].checked = source.checked;
}

function toggle2(source) {
    checkboxes2 = document.getElementsByName('status');
    for ( var i in checkboxes2)
        checkboxes2[i].checked = source.checked;
}
