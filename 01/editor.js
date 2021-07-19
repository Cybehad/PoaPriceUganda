window.addEventListener('load', function () {
    document.getElementById('noteeditor').setAttribute('contenteditable', 'true');
    document.getElementById('noteeditor').focus();
});

function format(command) {
    document.execCommand(command, false, '');
}
function addTable() {
    // let rows = document.getElementById('table-rows').value;
    // let cols = document.getElementById('table-cols').value;
    let modal = document.getElementById('table-specs');
    let html = "<table><thead><tr><th>jdjd</th><th>jdjd</th></tr></thead><tbody><tr><td>sss</td><td>ssss</td></tr></tbody></table><br>";
    document.execCommand('insertHTML', false, html);
}
function setUrl() {
    let url = document.getElementById('txtFormatUrl').value;
    let sText = document.getSelection();
    document.execCommand('insertHTML', false, '<a href="' + url + '" target="_blank">' + sText + '</a>');
    document.getElementById('txtFormatUrl').value = '';
}
function initialize_editor(editor_wrapper){
    alert(editor_wrapper)
    let wrapper = document.getElementById(editor_wrapper);
    let wrapper_innerHtml = '<div class="note-toolbar">\n' +
        '        <a href="javascript:void(0)" onclick="format(\'bold\')" title="Bold"><span class="fa fa-bold fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'selectAll\')" title="Select All"><span class="fa fa-check fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'undo\')" title="Undo"><span class="fa fa-undo fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'redo\')" title="Redo"><span class="fa fa-redo fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'cut\')" title="Cut"><span class="fa fa-cut fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'paste\')" title="Paste"><span class="fa fa-paste fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'italic\')" title="Italic"><span class="fa fa-italic fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="addTable()" title="Table"><span class="fa fa-table fa-fw"></span><span id="modal">jdjhdjdjs</span></a>\n' +
        '        <a href="javascript:void(0)" onclick="format(\'insertunorderedlist\')" title="Un ordered list"><span class="fa fa-list fa-fw"></span></a>\n' +
        '        <a href="javascript:void(0)" onclick="setUrl()" title="Link text"><span class="fa fa-link fa-fw"></span></a>\n' +
        '        <span><input id="txtFormatUrl" type="url" placeholder="http://ppu.com/" class="form-control"></span>\n' +
        '    </div>\n' +
        '    <div class="editor" id="noteeditor" autofocus></div>';
    wrapper.append(wrapper_innerHtml);
}
// "backColor"
// "bold"
// "createLink"
// "copy"
// "cut"
// "defaultParagraphSeparator"
// "delete"
// "fontName"
// "fontSize"
// "foreColor"
// "formatBlock"
// "forwardDelete"
// "insertHorizontalRule"
// "insertHTML"
// "insertImage"
// "insertLineBreak"
// "insertOrderedList"
// "insertParagraph"
// "insertText"
// "insertUnorderedList"
// "justifyCenter"
// "justifyFull"
// "justifyLeft"
// "justifyRight"
// "outdent"
// "paste"
// "redo"
// "selectAll"
// "strikethrough"
// "styleWithCss"
// "subscript"
// "superscript"
// "undo"
// "unlink"
// "useCSS"