#!/bin/zsh
# mac_turnoff_built_in_display.sh


while true
do
	target=25
	# 注意：在使用前，grep 里的内容需要修改成自己的外接显示器型号。
	if ~/.local/bin/lunar displays | grep -q -Ee "(LG HDR 4K|DELL P2715Q|DELL U2718Q)"; then
		target=0
	fi
	current=`~/.local/bin/lunar displays "Built-in" brightness | tail -n 1 | awk -F ': ' '{print $2}'`
	# echo -e "target:${target}\tcurrent:${current}"
	if [ ${target} -ne ${current} ]; then
		~/.local/bin/lunar displays "Built-in" brightness ${target} > /dev/null 2>&1
	fi
	sleep 5s
done


exit 0


