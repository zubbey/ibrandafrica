import Box from "@mui/material/Box";
import Stack from "@mui/material/Stack";
import Skeleton from "@mui/material/Skeleton";

function DetailSkeleton() {
  return (
    <Stack sx={{ overflow: "hidden" }} spacing={4}>
      <Box>
        <Skeleton width="100%" height={42} style={{ marginBottom: 1 }} />
        <Skeleton width="80%" height={42} />
      </Box>

      <Skeleton variant="rectangular" width={"100%"} height={400} sx={{ borderRadius: 1 }} />
      <Box sx={{ pt: 0.5 }}>
        <Skeleton width="60%" />
        <Skeleton height={20} style={{ marginBottom: 1 }} />
        <Skeleton height={20} style={{ marginBottom: 1 }} />
        <Skeleton height={20} width="75%" style={{ marginBottom: 1 }} />
      </Box>
    </Stack>
  );
}

export default DetailSkeleton;
