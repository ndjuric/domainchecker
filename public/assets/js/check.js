function CheckIsValidDomain(domain) {
    var re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/);
    return domain.match(re);
}

$('#check').click(function (event) {
    var domain_name = $('input[id=domainName]').val();
    var test = CheckIsValidDomain(domain_name);
    if (test === null) {
        swal("Error", "Invalid domain name format.", "error");
        $('#results').html('');
        return false;
    }
    $.post(
        '/api/check_domain',
        {
            domain_name: domain_name
        },
        function (data) {
            var status = data['status'];
            if (status === true) {
                swal("Available", data['message'], "success");
                $('#results').html('');
            } else {
                swal("Not available", data['message'], "error");
                if ('whois' in data) {
                    var whois = data['whois'];
                     whois = whois.replace(/(?:\r\n|\r|\n)/g, '<br />');
                    $('#results').html(whois);
                }

            }

        }
    );
    event.preventDefault();
});


