<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <script src="https://www.paypalobjects.com/webstatic/ppplus/ppplus.min.js" type="text/javascript"></script>
    <script type="application/javascript">
        var ppp = PAYPAL.apps.PPP(
        {
            approvalUrl: '<?=base_url().'paypal/success'?>',
            placeholder: "ppplus",
            mode: "sandbox",
            buttonLocation: "outside",
            useraction: "commit",
            country: 'BR',
            language: 'pt_BR',
            //preselection: preSelection,
            showPuiOnSandbox: true,
            showLoadingIndicator: true
        });
    </script>
    <div id="ppplus"></div>
</body>
</html>