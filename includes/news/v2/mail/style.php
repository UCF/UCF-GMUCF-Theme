<style type="text/css">

/* CSS Resets */
.ReadMsgBody {
	background-color: #fff;
	width: 100%;
}

.ExternalClass {
	background-color: #fff;
	width: 100%;
}

.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
	line-height: 100%;
}

body {
	-webkit-text-size-adjust: none;
	-ms-text-size-adjust: none;
}

body {
	margin: 0;
	padding: 0;
}

table {
	border-collapse: collapse;
	border-spacing: 0;
}

table td {
	padding: 0;
}

* {
	zoom: 1;
}

a {
	color: #069;
}

div,
p,
a,
li,
td {
	-webkit-text-size-adjust: none;
}

/* ios likes to enforce a minimum font size of 13px; kill it with this */


@media all and (max-width: 640px) {

	table {
		border-collapse: separate !important;
	}

	/* The outermost wrapper table */
	table[class='wrapperOuter'] {
		margin: 0 !important;
		width: 100% !important;
	}

	/* The firstmost inner tables, which should be padded at mobile sizes */
	table[class='wrapperInner'] {
		border-left: 0 solid transparent !important;
		border-right: 0 solid transparent !important;
		margin: 0 !important;
		padding-left: 15px;
		padding-right: 15px;
		width: 100% !important;
	}

	/* Generic class for a table column that should collapse to 100% width at mobile sizes */
	td[class='columnCollapse'],
	th[class='columnCollapse'] {
		border-left: 0 solid transparent !important;
		border-right: 0 solid transparent !important;
		clear: both;
		display: block !important;
		float: left;
		margin-left: 0 !important;
		margin-right: 0 !important;
		overflow: hidden;
		padding-left: 0 !important;
		padding-right: 0 !important;
		width: 100% !important;
	}

	/* Generic class for a table within a column that should be forced to 100% width at mobile sizes */
	table[class='tableCollapse'] {
		border-left: 0 solid transparent !important;
		border-right: 0 solid transparent !important;
		margin-left: 0 !important;
		margin-right: 0 !important;
		padding-left: 0 !important;
		padding-right: 0 !important;
		width: 100% !important;
	}

	/* Forces an image to fit 100% width of its parent */
	img[class='responsiveimg'] {
		max-width: none !important;
		width: 100% !important;
	}

	*[class='hidemobile'] {
		display: none;
		font-size: 0;
		line-height: 0;
		max-height: 0;
		overflow: hidden;
		width: 0;

		mso-hide: all;
		/* hide elements in Outlook 2007-2013 */
	}

	*[class='showmobile'] {
		display: block !important;
		font-size: initial;
		line-height: initial;
		max-height: none !important;
		overflow: visible !important;
		width: auto !important;

		mso-hide: none !important;
	}

	td[class='givebtn'] {
		font-size: 16px !important;
		padding: 10px !important;
	}

	td[class='givedesc'] {
		font-size: 16px !important;
	}
}
</style>
