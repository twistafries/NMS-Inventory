<script>

    function subtypeTextArea(){
        var comp = document.getElementById('selectComp');
        var area = document.getElementById('detailsArea');

        if(comp.options[comp.selectedIndex].value == 1 || comp.options[comp.selectedIndex].value == 2){
            area.value = 'Socket:\r\nChipset:\r\nSize:\r\nRAM:\r\n';
        } else {
            area.value = '';
        }
    }
</script>