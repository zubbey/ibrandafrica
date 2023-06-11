import Card from "@mui/material/Card";
import CardHeader from "@mui/material/CardHeader";
import Skeleton from "@mui/material/Skeleton";

function UserSkeleton() {
  return (
    <Card>
      <CardHeader
        avatar={<Skeleton animation="wave" variant="circular" width={40} height={40} />}
        title={<Skeleton animation="wave" height={20} width="80%" style={{ marginBottom: 6 }} />}
        subheader={<Skeleton animation="wave" height={20} width="40%" />}
      />
    </Card>
  );
}

export default UserSkeleton;
