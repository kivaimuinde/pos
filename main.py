def rotate(nums, k:int):
    result=[]
    for i in range(-k,len(nums)):
        result.append(nums[i])
    #result.extend(nums[0:k])
    return result

if __name__=='__main__':
    print(rotate([1,2,3,4,2,3,4],1))