import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemIcon from "@mui/material/ListItemIcon";
import ListItemText from "@mui/material/ListItemText";
import ListSubheader from "@mui/material/ListSubheader";
import Typography from "@mui/material/Typography";
import IconButton from "@mui/material/IconButton";
import Divider from "@mui/material/Divider";
import { ContactUs } from "../forms";
import Iconify from "../Iconify";

const StyledGrid = styled(Grid)(({ theme }) => ({
  width: "100%",
  backgroundColor: theme.palette.background.paper,
  borderTopLeftRadius: theme.spacing(8),
  borderBottomRightRadius: theme.spacing(8),
}));

function ContactList({ data, formRef, cursorEnter, cursorLeave }) {
  return (
    <Grid container spacing={4}>
      <StyledGrid item xs={12} sm={6}>
        <List
          component="nav"
          aria-labelledby="nested-list-subheader"
          sx={{ mb: 2 }}
          subheader={
            <ListSubheader component="div" id="nested-list-subheader" sx={{ fontSize: 24 }}>
              {data.section2.title}
            </ListSubheader>
          }
        >
          {data.section2.list.map((item, index) => (
            <ListItem key={index} sx={{ py: 0 }}>
              <ListItemIcon>
                <Iconify icon={item.icon} />
              </ListItemIcon>
              <ListItemText id="list1" primary={item.value} />
            </ListItem>
          ))}
        </List>
        <Divider />
        <List
          component="nav"
          sx={{ my: 4 }}
          aria-labelledby="nested-list-subheader"
          subheader={
            <ListSubheader component="div" id="nested-list-subheader" sx={{ fontSize: 24 }}>
              {data.section3.title}
            </ListSubheader>
          }
        >
          {data.section3.list.map((item, index) => (
            <ListItem key={index} sx={{ py: 0 }}>
              <ListItemText
                id="list2"
                primary={
                  <Box>
                    <Typography variant="h6">{item.country}</Typography>
                    <Typography variant="body1">{item.address}</Typography>
                    <Typography variant="body1">{item.line}</Typography>
                  </Box>
                }
              />
            </ListItem>
          ))}
        </List>
        <Divider />
        <List
          component="nav"
          aria-labelledby="nested-list-subheader"
          sx={{ my: 4 }}
          subheader={
            <ListSubheader component="div" id="nested-list-subheader" sx={{ fontSize: 24 }}>
              Social Media
            </ListSubheader>
          }
        >
          {data.socials.map((social, index) => (
            <ListItem key={index} sx={{ py: 0, display: "inline" }}>
              <IconButton
                key={index}
                aria-label={social.name}
                aria-controls="menu-appbar"
                aria-haspopup="true"
                size="small"
                sx={{ backgroundColor: social.color }}
                onClick={() => window.open(social.value, "_blank")}
              >
                <Iconify icon={social.icon} color="white" size={34} />
              </IconButton>
            </ListItem>
          ))}
        </List>
      </StyledGrid>
      <Grid item xs={12} sm={6}>
        <ContactUs type="default" formRef={formRef} cursorEnter={cursorEnter} cursorLeave={cursorLeave} />
      </Grid>
    </Grid>
  );
}

export default ContactList;
