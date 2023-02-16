import collections
slogan = 'We Debug Every Software Bug'
common = {}
for i in slogan.lower():
    if i in common:
        common[i] += 1
    else:
        common[i] = 1
most_common = max(common, key=common.get)
print (f'The maximum character is: {most_common}')