#include<stdio.h>

int main(int argc,char *argv[])
{
	int retStatus = 0;
	int ret1,ret2;
	FILE *f1 = fopen(argv[1],"r");
	FILE *f2 = fopen(argv[2],"r");
	char ch1,ch2;
	ret1 = fscanf(f1,"%c",&ch1); 
	ret2 = fscanf(f2,"%c",&ch2);
	if(ret1 != ret2)
	{
		fclose(f1);
		fclose(f2);
		return 1;
	}
	while(ch1==ch2)
	{

		ret1 = fscanf(f1,"%c",&ch1); 
		ret2 = fscanf(f2,"%c",&ch2);
		if(ret1 != ret2)
		{
			fclose(f1);
			fclose(f2);
			printf("1");
			return 1;
		}
		if(ret1 == -1)
		{
			fclose(f1);
			fclose(f2);
				printf("0");
			return 0;
		}			
		
	}

	fclose(f1);
	fclose(f2);
	printf("1");
	return 1;
}
