// this just makes sure leaving any console statements won't break the site
(function () {
	var noOp = function () {},
	methods = [
	'log',
	'warn',
	'count',
	'debug',
	'profile',
	'profileEnd',
	'trace',
	'dir',
	'dirxml',
	'assert',
	'time',
	'profile',
	'timeEnd',
	'group',
	'groupEnd'
	],
	i = methods.length;
	if (!this.console) this.console = {};
	while (i--) {
		if (this.console[methods[i]] === undefined) this.console[methods[i]] = noOp;
	}
})();