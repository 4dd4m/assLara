"run ctags
cabbrev ctags !ctags -R --exclude=node_modules --exclude=public --exclude=vendor .

"ignored directories

"search by filename
"let g:ctrlp_by_filename = 1

"resize window
let g:ctrlp_match_window = 'bottom,order:btt,min:1,max:20,results:20'

"hidden files
"let g:ctrlp_show_hidden = 0

"hide git untracked files
"let g:ctrlp_user_command = ['.git', 'cd %s && git ls-files']

"not remembered MRU files
"let g:ctrlp_mruf_exclude = '/tmp/.*\|/temp/.*\|server.php'

"MRU files are relative to this directory
let g:ctrlp_mruf_relative = 1
