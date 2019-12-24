$(function()
{
	$('body').on('test', '.quantidade', function()
	{
		$(this).TouchSpin();
	});
	$('body').trigger('test');
});